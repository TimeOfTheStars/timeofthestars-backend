FROM python:3.12.7-slim-bullseye

WORKDIR /app

COPY requirements.txt requirements.txt
RUN pip install -U pip && pip install --no-cache-dir -r requirements.txt

COPY . .

# Fix line endings and set executable permission
RUN apt-get update && apt-get install -y dos2unix \
  && dos2unix app.sh \
  && chmod +x app.sh \
  && apt-get remove -y dos2unix \
  && apt-get autoremove -y \
  && apt-get install -y --no-install-recommends postgresql-client \
  && rm -rf /var/lib/apt/lists/*
