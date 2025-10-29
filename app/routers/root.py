from fastapi import APIRouter
from fastapi.responses import RedirectResponse

router = APIRouter(tags=["Root"])


@router.get("/")
async def root() -> RedirectResponse:
    return RedirectResponse("/docs")


@router.get("/health")
async def health() -> dict:
    return {"message": "ok"}
