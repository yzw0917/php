<!DOCTYPE html>
<head>
    <meta charset="gb2312">
    <title>ѧ����Ϣ����</title>
    <script>
        function doDel(id) {
            if (confirm("ȷ��Ҫɾ��ô��")) {
                window.location = 'action.php?action=del&id='+id;
            }
        }
    </script>
</head>
<body>
<center>
    <?php
    include_once "menu.php";
    ?>
    <h3>���ѧ����Ϣ</h3>
    <table width="600" border="1">
        <tr>
            <th>ID</th>
            <th>����</th>
            <th>�Ա�</th>
            <th>����</th>
            <th>�༶</th>
            <th>����</th>
        </tr>
        <?php
        //1.�������ݿ�
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "root");
        } catch (PDOException $e) {
            die("���ݿ�����ʧ��" . $e->getMessage());
        }
        //2.���������������
        $pdo->query("SET NAMES 'UTF-8'");
        //3.ִ��sql��䣬��ʵ�ֽ����ͱ���
        $sql = "SELECT * FROM stu ";
        foreach ($pdo->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['sex']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td>{$row['classid']}</td>";
            echo "<td>
                    <a href='javascript:doDel({$row['id']})'>ɾ��</a>
                    <a href='edit.php?id=({$row['id']})'>�޸�</a>
                  </td>";
            echo "</tr>";
        }

        ?>

    </table>
</center>

</body>
</html>
