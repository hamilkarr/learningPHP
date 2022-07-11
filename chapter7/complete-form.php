<form action="<?= $form->encode($_SERVER['PHP_SELF']) ?>" method="post">
<table>
    <?php if($errors) : ?>
        <tr>
            <td>다음 항목을 수정해 주세요.</td>
            <td><ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $form->encode($error) ?></li>
                <?php endforeach; ?>
            </ul></td>
        </tr>
    <?php endif; ?> <!-- 이부분 개별 수정함 -->
    <tr>
        <td>이름: </td>
        <td><?= $form->input('text',['name' =>'name']) ?></td>
    </tr>
</table>
</form>