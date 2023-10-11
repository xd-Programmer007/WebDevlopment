from datetime import datetime
from os.path import exists,dirname
from os import remove
import os

class Customer :
    balance = 0 
    
    def __init__(self, name):
        self.name = name
        
         
#         create a file with the users name if it doesn't exitst
        self.create_file()
    
    def create_file(self):
        file = f'{self.name}.txt'
        current_directory = os.path.dirname(os.path.abspath(__file__))
        file_path = os.path.join(current_directory, file)
        if(not exists(file_path)):
            with open(f"{self.name}.txt","a") as f:
                Head = f'Account Holder name : {self.name}\n\tDate&time\ttype_of_transaction\tAmount\t  balance\n'
                f.write(Head)
                
    def read_user_file(self):
        # reads contents from the user file
        content = ""
        with open(f"{self.name}.txt","r") as f:
            content = f.read()
        return content
    
    def write_to_file(self,type_of_transaction,amount):
        # writes contents to the user file
        with open(f'{self.name}.txt','a') as f:
            transaction = f'{datetime.now().strftime("%d-%m-%Y %H:%M:%S")}      {type_of_transaction}\t\t {amount}    {self.balance}\n'
            f.write(transaction)
    
    def fetch_details(self):
        # incase user wants to view his bank details only
        print(self.read_user_file())
    
    def transaction(self,amount,type_of_transaction):
        if(type_of_transaction == "withdraw"):
            if(self.balance >= amount):
                self.balance -= amount
                self.write_to_file(type_of_transaction,amount)
                return f"withdrawal of {amount} was succesful\ncurrent balance is {self.balance}\n"
                
            else :
                return f"Withdrawal failed due to insufficient balance {self.balance} for amount {amount}\n"
        else :
            self.balance += amount
            self.write_to_file(type_of_transaction,amount)
            return f"deposit of {amount} was succesful\ncurrent balance is {self.balance}\n"
    

account_holder_name= input("Enter your Name..\n")
person = Customer(account_holder_name)

try :
    while True:
        operations = {1 : "withdraw", 2 : "deposit", 3 :"details"}
        op = int(input(f'what do you want to perform {operations}\n'))
        if(op in [1,2]):
            amt = float(input("Enter the required Amount\n"))
            statement = person.transaction(amt,operations[op])
            print(statement)
        else :
            person.fetch_details()
        user_exit = input("Do you want to exit?[Y/N]").upper()
        if(user_exit == 'Y'):
    #         remove file after all transactions are complete
            break
    
except Exception as e:
    print(e)
finally :
    file_to_delete =f'{account_holder_name}.txt'
    current_directory = os.path.dirname(os.path.abspath(__file__))
    file_path = os.path.join(current_directory, file_to_delete)
    remove(file_path)
    
