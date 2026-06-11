# Property API (Symfony Challenge)

## Overview

This project is a Symfony API that merges property data from two JSON sources, normalizes the structure, and returns a unified response via a single endpoint. It also uses caching for performance optimization.

---

## Features

- Fetches data from two JSON files
- Normalizes different data formats into a unified structure
- Merges results into a single response
- Implements caching for better performance
- Handles missing or invalid data safely

---

## Project Structure

- `src/Controller/PropertyController.php` – API endpoint
- `src/Service/PropertyService.php` – Business logic and caching
- `src/Service/JsonFileLoader.php` – Loads JSON files
- `src/Service/PropertyNormalizer.php` – Normalizes data

---

## API Endpoint

### Get Properties

GET /properties

### Response Example

```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "address": "123 Main St",
      "price": 100000,
      "source": "source1"
    }
  ]
}
```

## Run Project

symfony server:start

or 

php -S localhost:8000 -t public

## Notes 
 - No Database used
 - NO authentication included
 - Focus on clean architecture, caching and performance