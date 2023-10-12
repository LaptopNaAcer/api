# API First Act   
This API can browse through MySQL database.
    
## API Description 
 
  
This API can insert, update delete a data from the DEMO db in MySQL.
  
  
 
## API Endpoints  

1.  **API Endpoint: postName**
    
    -   Description: This endpoint is used to submit a new name for storage in the database.
2.  **API Endpoint: printName**
    
    -   Description: This endpoint is designed to retrieve and print names stored in the database.
3.  **API Endpoint: updateName**
    
    -   Description: This endpoint is used to update an existing name's information in the database based on an identifier.
4.  **API Endpoint: deleteName**
    
    -   Description: This endpoint is used to delete a name from the database based on a provided identifier.  

## Request Payload  

1. **JSON Payload for postName (Submit a New Name):**

   Request Payload Structure:
   ```json
   {
     "lname": "hortizuela",
     "fname": "manny"
   }
   ```

   - **Fields Explanation:**
     - "lname" (Last Name): A required field representing the last name of the individual.
     - "fname" (First Name): A required field representing the first name of the individual.

   In the example provided, the request payload specifies the last name as "hortizuela" and the first name as "manny" when submitting a new name.

2. **JSON Payload for updateName (Update Name Information):**

   Request Payload Structure:
   ```json
   {
     "id": 1,
     "lname": "wick",
     "fname": "john"
   }
   ```

   - **Fields Explanation:**
     - "id" (Identifier): A required field representing the identifier of the name to be updated.
     - "lname" (Last Name): An optional field representing the updated last name. It is not required but can be included if the last name needs to be changed.
     - "fname" (First Name): An optional field representing the updated first name. It is not required but can be included if the first name needs to be changed.

   In the example provided, the request payload includes the identifier (id) of 1 and, optionally, the new last name as "wick" and the new first name as "john" for updating a name.

3. **JSON Payload for deleteName (Delete Name):**

   Request Payload Structure:
   ```json
   {
     "id": 1
   }
   ```

   - **Fields Explanation:**
     - "id" (Identifier): A required field representing the identifier of the name to be deleted.

   In the example provided, the request payload includes the identifier (id) of 1, indicating which name should be deleted from the database.  
  
  
  
## Response  
  
  
Describe the  
structure of the API response, including possible status codes and JSON  
examples.  
  
  
  
  
  
## Usage  
  
  
1.  **postName (Submit a New Name):**
    
    -   Usage: Use this endpoint to add a new name to the database. For example, when a user fills out a registration form, you can send a POST request to this endpoint with the last name (lname) and first name (fname) data to store a new name in the database.
2.  **updateName (Update Name Information):**
    
    -   Usage: This endpoint is used to update the information of an existing name in the database, identified by its unique identifier (id). For instance, if a user wants to change their last name or first name, you can send a PUT or PATCH request to this endpoint with the specific identifier (id) and the updated last name (lname) and/or first name (fname) to modify the existing name.
3.  **deleteName (Delete Name):**
    
    -   Usage: This endpoint is used to remove a name from the database based on the unique identifier (id). For example, when a user decides to delete their account or name from the system, you can send a DELETE request to this endpoint with the identifier (id) of the name to be deleted.
4.  **printName (Retrieve and Print Names):**
    
    -   Usage: This endpoint is used to retrieve and possibly display a list of names from the database, depending on the parameters you include in the request. For example, when you want to display a list of registered users on a webpage, you can send a GET request to this endpoint to retrieve the list of names. The specific usage may involve additional filtering or sorting criteria as needed.
  
  
  
  
  
## License  
  
  
This API is distributed to:
ITPC -115 : Sir Manny Hortizuela
  
  
  
  
  
## Contributors  

github: Oconer-giy
email: donellpie@gmail.com
  
  
  
  
## Contact  
You may contact us at:
**Niels Azer Agustin:**
*Gmail: agustinnielsazer06@gmail.com*
*Phone Number: Smart - +639673385957*

**Donell Carl G. Oconer**
*Gmail: donellpie@gmail.com*
