<body>
    제출된 값은 다음과 같습니다:
    <br>

    product id : <?php if(isset($_POST['product_id'])){echo $_POST['product_id']; }?>
    <br>
    category: <?php if(isset($_POST['category'])){echo $_POST['category'];}?>
</body>