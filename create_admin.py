import asyncio
import argparse
import getpass
from sqlalchemy.future import select

from app.db.base import session_maker
from app.db.models import AdminUser


async def create_admin(username: str, password: str, is_active: bool = True):
    """
    Создает нового администратора в базе данных
    
    Args:
        username: Имя пользователя
        password: Пароль (будет захеширован автоматически)
        is_active: Активен ли пользователь (по умолчанию True)
    """
    async with session_maker() as session:
        # Проверяем, существует ли уже пользователь с таким username
        result = await session.execute(
            select(AdminUser).where(AdminUser.username == username)
        )
        existing_user = result.scalar_one_or_none()
        
        if existing_user:
            print(f"❌ Ошибка: Администратор с username '{username}' уже существует!")
            return False
        
        # Создаем нового администратора
        # Пароль будет автоматически захеширован через event listener в модели
        admin_user = AdminUser(
            username=username,
            hashed_password=password,  # Будет захеширован автоматически
            is_active=is_active
        )
        
        session.add(admin_user)
        await session.commit()
        
        print(f"✅ Администратор '{username}' успешно создан!")
        return True


async def list_admins():
    """Выводит список всех администраторов"""
    async with session_maker() as session:
        result = await session.execute(select(AdminUser))
        admins = result.scalars().all()
        
        if not admins:
            print("📋 Администраторы не найдены")
            return
        
        print("📋 Список администраторов:")
        print("-" * 50)
        for admin in admins:
            status = "✅ Активен" if admin.is_active else "❌ Неактивен"
            print(f"ID: {admin.id} | Username: {admin.username} | {status}")
        print("-" * 50)


async def update_admin_password(username: str, new_password: str):
    """Обновляет пароль администратора"""
    async with session_maker() as session:
        result = await session.execute(
            select(AdminUser).where(AdminUser.username == username)
        )
        admin_user = result.scalar_one_or_none()
        
        if not admin_user:
            print(f"❌ Ошибка: Администратор с username '{username}' не найден!")
            return False
        
        # Обновляем пароль (будет захеширован автоматически)
        admin_user.hashed_password = new_password
        await session.commit()
        
        print(f"✅ Пароль для администратора '{username}' успешно обновлен!")
        return True


async def deactivate_admin(username: str):
    """Деактивирует администратора"""
    async with session_maker() as session:
        result = await session.execute(
            select(AdminUser).where(AdminUser.username == username)
        )
        admin_user = result.scalar_one_or_none()
        
        if not admin_user:
            print(f"❌ Ошибка: Администратор с username '{username}' не найден!")
            return False
        
        admin_user.is_active = False
        await session.commit()
        
        print(f"✅ Администратор '{username}' деактивирован!")
        return True


async def activate_admin(username: str):
    """Активирует администратора"""
    async with session_maker() as session:
        result = await session.execute(
            select(AdminUser).where(AdminUser.username == username)
        )
        admin_user = result.scalar_one_or_none()
        
        if not admin_user:
            print(f"❌ Ошибка: Администратор с username '{username}' не найден!")
            return False
        
        admin_user.is_active = True
        await session.commit()
        
        print(f"✅ Администратор '{username}' активирован!")
        return True


def get_password_interactive(prompt: str = "Введите пароль: ") -> str:
    """Безопасно запрашивает пароль у пользователя"""
    password = getpass.getpass(prompt)
    if not password:
        print("❌ Ошибка: Пароль не может быть пустым!")
        return get_password_interactive(prompt)
    return password


def main():
    parser = argparse.ArgumentParser(
        description="Управление администраторами системы",
        formatter_class=argparse.RawDescriptionHelpFormatter,
        epilog="""
Примеры использования:
  # Создать нового администратора (пароль будет запрошен интерактивно)
  python create_admin.py create --username admin
  
  # Создать администратора с паролем из аргумента
  python create_admin.py create --username admin --password mypassword
  
  # Показать список всех администраторов
  python create_admin.py list
  
  # Обновить пароль администратора
  python create_admin.py update-password --username admin --password newpassword
  
  # Деактивировать администратора
  python create_admin.py deactivate --username admin
  
  # Активировать администратора
  python create_admin.py activate --username admin
        """
    )
    
    subparsers = parser.add_subparsers(dest='command', help='Команда для выполнения')
    
    # Команда создания администратора
    create_parser = subparsers.add_parser('create', help='Создать нового администратора')
    create_parser.add_argument('--username', required=True, help='Имя пользователя')
    create_parser.add_argument('--password', help='Пароль (если не указан, будет запрошен интерактивно)')
    create_parser.add_argument('--inactive', action='store_true', help='Создать неактивного администратора')
    
    # Команда списка администраторов
    list_parser = subparsers.add_parser('list', help='Показать список всех администраторов')
    
    # Команда обновления пароля
    update_parser = subparsers.add_parser('update-password', help='Обновить пароль администратора')
    update_parser.add_argument('--username', required=True, help='Имя пользователя')
    update_parser.add_argument('--password', help='Новый пароль (если не указан, будет запрошен интерактивно)')
    
    # Команда деактивации
    deactivate_parser = subparsers.add_parser('deactivate', help='Деактивировать администратора')
    deactivate_parser.add_argument('--username', required=True, help='Имя пользователя')
    
    # Команда активации
    activate_parser = subparsers.add_parser('activate', help='Активировать администратора')
    activate_parser.add_argument('--username', required=True, help='Имя пользователя')
    
    args = parser.parse_args()
    
    if not args.command:
        parser.print_help()
        return
    
    try:
        if args.command == 'create':
            password = args.password
            if not password:
                password = get_password_interactive("Введите пароль: ")
                password_confirm = getpass.getpass("Подтвердите пароль: ")
                if password != password_confirm:
                    print("❌ Ошибка: Пароли не совпадают!")
                    return
            
            asyncio.run(create_admin(
                username=args.username,
                password=password,
                is_active=not args.inactive
            ))
        
        elif args.command == 'list':
            asyncio.run(list_admins())
        
        elif args.command == 'update-password':
            password = args.password
            if not password:
                password = get_password_interactive("Введите новый пароль: ")
                password_confirm = getpass.getpass("Подтвердите новый пароль: ")
                if password != password_confirm:
                    print("❌ Ошибка: Пароли не совпадают!")
                    return
            
            asyncio.run(update_admin_password(
                username=args.username,
                new_password=password
            ))
        
        elif args.command == 'deactivate':
            asyncio.run(deactivate_admin(username=args.username))
        
        elif args.command == 'activate':
            asyncio.run(activate_admin(username=args.username))
    
    except KeyboardInterrupt:
        print("\n❌ Операция отменена пользователем")
    except Exception as e:
        print(f"❌ Ошибка: {e}")
        import traceback
        traceback.print_exc()


if __name__ == "__main__":
    main()

