
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Jihan</title>

    <style>
        /* CSS */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;

        }

        body {
            font-family: Arial, sans-serif;
            background: #fffaf6;
            color: #514b4b;
        }

        /* Header */
        .header {
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            border-bottom: 1px solid #f3dddd;
        }

        .logo {
            color: #d9829b;
            font-size: 22px;
            font-weight: bold;
        }

        /* Layout */
        .layout {
            display: flex;
            min-height: calc(100vh - 130px);
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            padding: 25px 15px;
            background: #fff1f4;
            border-right: 1px solid #f3dddd;
        }

        .sidebar h3 {
            margin-bottom: 20px;
            color: #d9829b;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 12px;
            color: #514b4b;
        }

        /* Isi */
        .content {
            flex: 1;
            padding: 35px;
        }

        .welcome {
            padding: 30px;
            background: white;
            border-radius: 22px;
        }

        /* Footer */
        .footer {
            padding: 18px;
            text-align: center;
            background: #fff1f4;
            color: #918889;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="header">
        <div class="logo">♡ Jihan</div>
        <div> <a href="logout.php">↪ logout</a> </div>
    </header>