moves_left = 9
userTurn = True
board = [str(i) for i in range(9)]
xo = ['X','O']
winner  = 0

def display(board):
    global userTurn
    if(not userTurn):
        print("\n---------Computer Move-----------\n")
    topRow = f'{board[0]} | {board[1]} | {board[2]}'
    middleRow = f'{board[3]} | {board[4]} | {board[5]}'
    bottomRow = f'{board[6]} | {board[7]} | {board[8]}'
    centerLine = '-'*max(len(topRow),len(middleRow),len(bottomRow))
    print()
    print(topRow)
    print(centerLine)
    print(middleRow)
    print(centerLine)
    print(bottomRow)
    if(not userTurn):
        print("\n---------------------------------\n")
    print()

def user_move(board):
    user_input = ""
    display(board)
    while True:
        user_input = input("select the numbers where you want to place 'X'..\n")
        if not user_input.isdecimal():
            print("The input entered is not valid...\n")
        else :
            user_input = int(user_input)
            break
    board[user_input] = 'X'
        
    
    
def result(board) -> int:
    if(board[0] == board[4] and board[4] == board[8] and board[8] in xo):
        if(board[8] == 'O'):
            return 10
        else :
            return -10
    elif(board[2] == board[4] and board[4] == board[6] and board[6] in xo):
        if(board[6] == 'O'):
            return 10
        else :
            return -10
    for j in range(3):
        i = 3*j
        if( board[i] == board[i+1] and board[i+1] == board[i+2] and (board[i+2] in xo )):
            if(board[i+2] == 'O' ):
                return 10
            else :
                return -10
        elif(board[j] == board[j+3] and board[j+3] == board[j+6] and (board[j+6] in xo) ):
            if(board[j+6] == 'O'):
                return 10
            else :
                return -10
    return 0


def MiniMax(temp, turn, moves) -> int :
    res = result(temp)
    if moves == 0 or res != 0:
        return res 
    temp1 = temp.copy()
    if turn == 1 :
        maxi = -100
        for i in range(9):
            if temp[i] not in xo:
                temp1[i] = 'O'
                maxi = max(maxi , MiniMax(temp1,-1,moves-1))
                temp1[i] = str(i)
        return maxi
    else :
        mini = 100
        for i in range(9):
            if temp[i] not in xo :
                temp1[i] = 'X'
                mini = min(mini, MiniMax(temp1, 1, moves-1))
                temp1[i] = str(i)
        return mini

def computer_move(temp,moves):
    maxi = -101
    index = -1
    for i in range(9):
        if temp[i] not in xo  :
            temp1 = temp.copy()
            temp1[i] = 'O'
            val =  MiniMax(temp1,-1,moves-1)
            temp1[i] = str(i)
            if val > maxi :
                maxi = val
                index = i
    return index
    
def game_begin():
    moves_left = 9
    board = [str(i) for i in range(9)]
    winner = 0
    global userTurn
    userTurn = True
    while (moves_left and winner == 0) :
        if(userTurn):
            user_move(board)
        else :
            temp = board.copy()
            index =computer_move(temp,moves_left)
            board[index] = 'O'
            display(board)
        userTurn = (userTurn == False)
        moves_left -= 1
        winner = result(board)
    return winner

if __name__ == "__main__":
    user_input = "y"
    while user_input == 'y':
        winner = game_begin()
        if(winner == 10):
            print("Computer won")
        elif(winner == -10):
            print("User won")
        else:
            print("It is a draw")
        user_input = input("Do you want to continue?[Y/N]").strip().lower()
        
    
    
    

