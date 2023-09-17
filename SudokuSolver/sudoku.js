"use strict";

var EASY_PUZZLE = "1-58-2----9--764-52--4--819-19--73-6762-83-9-----61-5---76---3-43--2-5-16--3-89--";
var MEDIUM_PUZZLE = "-3-5--8-45-42---1---8--9---79-8-61-3-----54---5------78-----7-2---7-46--61-3--5--";
var HARD_PUZZLE = "8----------36------7--9-2---5---7-------457-----1---3---1----68--85---1--9----4--";

// Set this variable to true to publicly expose otherwise private functions inside of SudokuSolver
var TESTABLE = true;
var SudokuSolver = function(testable) {
    var solver;

    // PUBLIC FUNCTIONS
    function solve(boardString) {
        var boardArray = boardString.split("");
        if (boardIsInvalid(boardArray)) {
            return false;
        }
        return recursiveSolve(boardString);
    }

    function solveAndPrint(boardString) {
        var solvedBoard = solve(boardString);
        return solvedBoard;
    }

    // PRIVATE FUNCTIONS
    function recursiveSolve(boardString) {
        var boardArray = boardString.split("");
        if (boardIsSolved(boardArray)) {
            return boardArray.join("");
        }
        var cellPossibilities = getNextCellAndPossibilities(boardArray);
        var nextUnsolvedCellIndex = cellPossibilities.index; //this is a int value
        var possibilities = cellPossibilities.choices; //this is an array of possible numbers (string)
        for (var i = 0; i < possibilities.length; i++) {
            boardArray[nextUnsolvedCellIndex] = possibilities[i];
            var solvedBoard = recursiveSolve(boardArray.join("")); //can return string or false;
            //if it returns string we return it as our main answer else we try other possibilities for the index 
            if (solvedBoard) {
                return solvedBoard;
            }
        }
        return false;
    }

    function boardIsInvalid(boardArray) {
        return !boardIsValid(boardArray);
    }

    function boardIsValid(boardArray) {
        return allRowsValid(boardArray) && allColumnsValid(boardArray) && allBoxesValid(boardArray);
    }

    function boardIsSolved(boardArray) {
        for (var i = 0; i < boardArray.length; i++) {
            if (boardArray[i] === "-") {
                return false;
            }
        }
        return true;
    }

    function getNextCellAndPossibilities(boardArray) {
        for (var i = 0; i < boardArray.length; i++) {
            if (boardArray[i] === "-") {
                var existingValues = getAllIntersections(boardArray, i);
                var choices = ["1", "2", "3", "4", "5", "6", "7", "8", "9"].filter(function(num) {
                    return existingValues.indexOf(num) < 0;
                });
                return { index: i, choices: choices };
            }
        }
    }

    function getAllIntersections(boardArray, i) {
        return getRow(boardArray, i).concat(getColumn(boardArray, i)).concat(getBox(boardArray, i));
    }

    function allRowsValid(boardArray) {
        return [0, 9, 18, 27, 36, 45, 54, 63, 72].map(function(i) {
            return getRow(boardArray, i); //this function retuns arrays of strings as rows=["0,1,2,..8","9,10,11,..17","72,73,..81"]
        }).reduce(function(validity, row) {
            return collectionIsValid(row) && validity;
        }, true);
        //reduce(function(previousValue, currentValue) { /* … */ }, initialValue);
        //previousValue
        // The value resulting from the previous call to callbackFn. On first call, initialValue if specified, otherwise the value of array[0].

        // currentValue
        // The value of the current element. On first call, the value of array[0] if an initialValue was specified, otherwise the value of array[1].
    }

    function getRow(boardArray, i) {
        var startingEl = Math.floor(i / 9) * 9;
        return boardArray.slice(startingEl, startingEl + 9);
    }

    function allColumnsValid(boardArray) {
        return [0, 1, 2, 3, 4, 5, 6, 7, 8].map(function(i) {
            return getColumn(boardArray, i); //this function retuns arrays of strings as columns =["0,9,18,..72","1,10,19,..73",..."8,17,...81"]
        }).reduce(function(validity, row) {
            return collectionIsValid(row) && validity;
        }, true);
    }

    function getColumn(boardArray, i) {
        var startingEl = Math.floor(i % 9); //for ith index the column starts with this value,Ex:floor(28%9) === 1 means column is 1
        return [0, 1, 2, 3, 4, 5, 6, 7, 8].map(function(num) {
            return boardArray[startingEl + num * 9];
        });
    }

    function allBoxesValid(boardArray) {
        return [0, 3, 6, 27, 30, 33, 54, 57, 60].map(function(i) {
            return getBox(boardArray, i);
        }).reduce(function(validity, row) {
            return collectionIsValid(row) && validity;
        }, true);
    }

    function getBox(boardArray, i) {
        var boxCol = Math.floor(i / 3) % 3;
        var boxRow = Math.floor(i / 27);
        var startingIndex = boxCol * 3 + boxRow * 27; //for ith element  this calculation gives startInd of its boxNumber Ex(38)
        //boxCol = 0 ,boxRow= 1 => startingIndex = 27;
        return [0, 1, 2, 9, 10, 11, 18, 19, 20].map(function(num) {
            return boardArray[startingIndex + num];
        });
    }

    function collectionIsValid(collection) {
        //checks for duplicacy in strings
        var numCounts = {}; //this is an object declaration
        for (var i = 0; i < collection.length; i++) {
            if (collection[i] != "-") {
                if (numCounts[collection[i]] === undefined) {
                    numCounts[collection[i]] = 1;
                } else {
                    return false;
                }
            }
        }
        return true;
    }

    function toString(boardArray) {
        return [0, 9, 18, 27, 36, 45, 54, 63, 72].map(function(i) {
            return getRow(boardArray, i).join(" ");
        }).join("\n");
    }

    if (testable) {
        // These methods will be exposed publicly when testing is on.
        solver = {
            solve: solve,
            solveAndPrint: solveAndPrint,
            recursiveSolve: recursiveSolve,
            boardIsInvalid: boardIsInvalid,
            boardIsValid: boardIsValid,
            boardIsSolved: boardIsSolved,
            getNextCellAndPossibilities: getNextCellAndPossibilities,
            getAllIntersections: getAllIntersections,
            allRowsValid: allRowsValid,
            getRow: getRow,
            allColumnsValid: allColumnsValid,
            getColumn: getColumn,
            allBoxesValid: allBoxesValid,
            getBox: getBox,
            collectionIsValid: collectionIsValid,
            toString: toString
        };
    } else {
        // These will be the only public methods when testing is off.
        solver = {
            solve: solve,
            solveAndPrint: solveAndPrint
        };
    }

    return solver;
}(TESTABLE);