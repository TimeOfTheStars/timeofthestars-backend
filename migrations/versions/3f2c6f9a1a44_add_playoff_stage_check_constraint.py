"""add playoff_stage check constraint for game

Revision ID: 3f2c6f9a1a44
Revises: 6b7d3f2a9c1e
Create Date: 2026-03-20 00:00:00.000000
"""

from typing import Sequence, Union

from alembic import op


# revision identifiers, used by Alembic.
revision: str = "3f2c6f9a1a44"
down_revision: Union[str, None] = "6b7d3f2a9c1e"
branch_labels: Union[str, Sequence[str], None] = None
depends_on: Union[str, Sequence[str], None] = None


def upgrade() -> None:
    op.create_check_constraint(
        "ck_games_playoff_stage",
        "games",
        "playoff_stage IN ("
        "'matches',"
        "'quarterfinal',"
        "'semifinal',"
        "'final',"
        "'1/4 финала',"
        "'1/2 финала',"
        "'финал'"
        ")",
    )


def downgrade() -> None:
    op.drop_constraint("ck_games_playoff_stage", "games", type_="check")

