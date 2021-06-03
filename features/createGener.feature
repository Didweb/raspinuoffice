Feature:
  Create new resource Gener
  As an API Client

Scenario: Create Gener
  Given the request body is:
  """
   {
    "gener": [
      {
        "id": "b026b3f4-be48-11eb-8529-0242ac130007",
        "name": "Rocksasas"
      }
    ]
  }
  """
  When i Post to "/api/create/gener"
  Then the response code is 204