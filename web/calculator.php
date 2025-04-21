<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 20px;
}

.container {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
    transition: transform 0.3s ease;
}

.container:hover {
    transform: translateY(-5px);
}

h2 {
    color: #2a5298;
    text-align: center;
    margin-bottom: 25px;
    font-size: 24px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

input[type="number"] {
    padding: 12px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

input[type="number"]:focus {
    outline: none;
    border-color: #2a5298;
    box-shadow: 0 0 8px rgba(42, 82, 152, 0.3);
    background: #fff;
}

input[type="number"]:hover {
    border-color: #1e3c72;
}

select {
    padding: 12px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    background: #f8f9fa;
    cursor: pointer;
    transition: all 0.3s ease;
}

select:focus {
    outline: none;
    border-color: #2a5298;
    box-shadow: 0 0 8px rgba(42, 82, 152, 0.3);
}

select:hover {
    border-color: #1e3c72;
}

button {
    padding: 12px;
    background: #2a5298;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: 600;
    transition: all 0.3s ease;
}

button:hover {
    background: #1e3c72;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

button:active {
    transform: translateY(0);
}

.result-box {
    margin-top: 20px;
    padding: 15px;
    background: #e8f0fe;
    border-radius: 8px;
    text-align: center;
    font-size: 18px;
    color: #2a5298;
    border: 2px solid #2a5298;
    transition: all 0.3s ease;
}

.result-box:hover {
    background: #d1e2ff;
    transform: scale(1.02);
}
</style>
<body>
    <div class="container">
        <h2>kalkulator sederhana </h2>
        <form method="post">
          <input type="number" step="any" name="num1" required>
          <select name="operator" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
          </select>
          <input type="number" step="any" name="num2" required>
          <button type="submit" name="calculate">hitung</button>
        </form>
        <?php

        if (isset($_POST['calculate'])) {
            $num1 = (float) $_POST['num1'];
            $num2 = (float) $_POST['num2'];
            $operator = $_POST['operator'];
            $result = '';

            switch ($operator) {
                case '+':
                   $result = $num1 + $num2;
                   break;                
                case '-':
                   $result = $num1 - $num2;
                   break;                
                case '*':
                   $result = $num1 * $num2;
                   break;                
                case '/':
                   if ($num2 == 0) {
                     $result = "error: pembagian dengan nol!";
                   }else{
                    $result = $num1 / $num2;
                   }
                   break; 
                   default:
                   $result ="operator tidak valid";
                   break;               
            }
            echo "<div class='result-box'>hasil: $result</div>";
        }
        ?>
    </div>
</body>
</html>