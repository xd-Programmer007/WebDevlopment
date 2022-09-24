expr = ""
flag = false;

function clear_() {
    expr = "";
    document.getElementById("display").value = "";
}

function calc(txt) {

    expr += txt;
    document.getElementById("display").value = expr;
}

function eval_() {
    try {
        ans = eval(expr).toFixed(4);
        if (isNaN(ans) || !isFinite(ans))
            throw 1;
        expr = ans.toString();
        document.getElementById("display").value = ans.toString();
    } catch (err) {
        document.getElementById("display").value = "Please Enter Correct Input";
    }
}