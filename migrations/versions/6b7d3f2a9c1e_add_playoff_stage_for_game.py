"""add playoff_stage for game

Revision ID: 6b7d3f2a9c1e
Revises: 405473d5cefe
Create Date: 2026-03-20 00:00:00.000000
"""

from typing import Sequence, Union

from alembic import op
import sqlalchemy as sa


# revision identifiers, used by Alembic.
revision: str = "6b7d3f2a9c1e"
down_revision: Union[str, None] = "405473d5cefe"
branch_labels: Union[str, Sequence[str], None] = None
depends_on: Union[str, Sequence[str], None] = None


def upgrade() -> None:
    # Устанавливаем server_default, чтобы не ломать существующие записи в БД.
    op.add_column(
        "games",
        sa.Column(
            "playoff_stage",
            sa.String(),
            nullable=False,
            server_default="matches",
        ),
    )


def downgrade() -> None:
    op.drop_column("games", "playoff_stage")

