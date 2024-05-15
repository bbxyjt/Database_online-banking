
README - BNLTT online banking system

How to access the web page
Customer’s link : http://localhost/BNLTT_online_bank/BNLTT_online_banking/
Employee’s link : http://localhost/BNLTT_online_bank/BNLTT_online_banking/indexEmployee.php

— CUSTOMER’s ACCESS —

Account Login Form
Fill the account number (from account table on online_bank database) and also the password (from account table on online_bank database), both need to be matched. If the password is incorrect, it will show “Incorrect password. Please try again.” Also if the account number is wrong, it will display “Invalid account number or password”.

Account Register Form
Fill in all the following information, if you miss any of that information it will display “Please Input data” followed by the missing information. And once all the information is entered correctly, you will have an account and be ready to login.
The interest rate of fixed deposit, salary, and saving account type is 0.75%, 0.25%, and 0.25% respectively.

Pay Alert Form
Fill the account number (from account table on online_bank database), amount and due date. The account number filled needs to be the account number of BNLTT customers only. If the customer forgot to input any information the error message will display depending on what caused it.
If the payer takes no action before the due date, the balance will automatically deduct from the payer account on the due date.

Transfer
There are 2 alternatives here, one is transferring with the card and another is transferring without the card. *Notes : Money will be transferred immediately from the bank account, so you can see the update on the Balance column on account table, online_bank database. 
Transferring with the card : Need to fill the card number, transaction type (like : Withdraw, Payment, Transferring and Swipe card, knowing that except withdraw you need to fill in the recipient number if not it will display “Recipient number is required for Payment, Swipe card, and Transferring transactions.”), amount, transaction details and password.
Transferring without the card : The required information is the same as transferring with the card, but there’s no need to fill in the card number.
If the entered password is incorrect, then it will display “Incorrect Password”.
If the required information is not entered, it will display “Please input data” followed by that missing information.


Loan and Loan Transaction
In Loan, select credit bureau, loan type, loan amount and loan year to match with the selected loan type. For example, WealthWave: Interest Rate 2% per year, 2 years of contract, Minimum 50000$ Not Exceed 100000$. So loan amount should be between 50000 and 100000 as well as loan year should be greater than 2 years. 
In Loan Transaction, Enter the Loan ID that has been registered and has been approved by the employee so you are able to pay your loan. *Notes : customers can only pay their own loan. Once the customer has paid the total amount of the loan, It will update the payment status in the loan table to be “Completed”.

Change information
In order to change personal information our bank has a function to verify that it is your account by input the password. If the password is matched, you can change email, phone number, address.

Logout button
When you press the logout button it will lead you to the Account Login page

— EMPLOYEE’s ACCESS —

Employee Login 
Fill the Employee Email (from employee_contact table on online_bank database) and also the password (from employee table on online_bank database), both need to be matched. If the password is incorrect, it will show “Incorrect password. Please try again.” Also if the account number is wrong, it will display “Invalid account number or password”. *Notes : email is case-insensitive

Employee Registration Form
Fill in all the following information, if you miss any of that information it will display “Please Input data” followed by the missing information. And once all the information is entered correctly, you will have an account and be ready to login.

Account analysis
There are 6 banners on the top of the page, where you can press on the topic of the analysis report to look at. And the back button is only on the first banner which shows all analysis reports here. Including : Highest balance, Average transaction amount, Suspended account, Highest total transaction amount, Branches with highest credit card count. 

Update Loan Status
Fill in the Loan ID, and the status of the loan whether it is the Approve, Pending or Reject. If the Loan ID is incorrect or does not exist in the data, it will display “Invalid Loan ID”. 
Once the loan is approved, the customer will be forced to pay the first loan without the interest.

Update Card Status
Fill in the Employee Registration Form Customer’s card number, and the status of the card whether it is the Active or Inactive. If the Customer’s Card Number is incorrect or does not exist in the data, it will display “Invalid Card Number”.

Logout button
When you press the logout button it will lead you to the Employee Login page
