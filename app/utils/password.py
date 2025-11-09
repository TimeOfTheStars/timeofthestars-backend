import sys
import io

_original_stderr = sys.stderr
_suppressed_stderr = io.StringIO()

sys.stderr = _suppressed_stderr

try:
    from passlib.context import CryptContext
finally:
    sys.stderr = _original_stderr


def create_password_context():
    _original_stderr = sys.stderr
    _suppressed_stderr = io.StringIO()
    sys.stderr = _suppressed_stderr
    
    try:
        context = CryptContext(schemes=["bcrypt"], deprecated="auto")
    finally:
        sys.stderr = _original_stderr
    
    return context

pwd_context = create_password_context()

