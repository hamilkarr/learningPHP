<form action="<?= $form->encode($_SERVER['PHP_SELF']) ?>" method="post">
<table>
    <?php if($errors) : ?>
        <tr>
            <td>���� �׸��� ������ �ּ���.</td>
            <td><ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $form->encode($error) ?></li>
                <?php endforeach; ?>
            </ul></td>
        </tr>
    <?php endif; ?> <!-- �̺κ� ���� ������ -->
    <tr>
        <td>�̸�: </td>
        <td><?= $form->input('text',['name' =>'name']) ?></td>
    </tr>
</table>
</form>