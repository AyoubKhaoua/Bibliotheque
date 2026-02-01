<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 30px 15px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .header {
            background: white;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            border-bottom: 3px solid #667eea;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .header i {
            font-size: 32px;
            color: #667eea;
        }

        .btn-add-book {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-add-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.35);
            color: white;
        }

        .btn-add-book:active {
            transform: translateY(0);
        }

        .btn-add-book a {
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #f8f9fa;
            border-bottom: 2px solid #667eea;
        }

        table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #333;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            color: #555;
        }

        table tbody tr {
            transition: background-color 0.2s ease;
        }

        table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Fixed button styles */
        .action-buttons button {
            width: 70px;
            height: 30px;
            border: 3px solid #315cfd;
            border-radius: 25px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
            font-size: 1em;
            font-weight: 400;
            color: #315cfd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-buttons button:hover {
            background: #315cfd;
            color: white;
            font-size: 1em;
        }

        /* Make <a> inherit styles inside buttons */
        .action-buttons button a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            transition: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .update-btn {
            color: #315cfd;
        }

        .delete-btn {
            color: #315cfd;
        }

        .table-wrapper {
            padding: 30px;
            overflow-x: auto;
        }

        .empty-message {
            padding: 60px 30px;
            text-align: center;
            color: #999;
        }

        .empty-message p {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <i class="bi bi-book-half"></i>
                <h1>Book Library</h1>
            </div>
            <a href="create" class="btn-add-book">
                <i class="bi bi-plus-lg"></i> New Book
            </a>
        </div>

        <div class="table-wrapper">
            <table border="2px">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>discription</th>
                    <th style="text-align: center;">delete</th>
                    <th style="text-align: center;">update</th>
                </tr>

                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->description }}</td>
                        <td style="text-align: center;">
                            <div class="action-buttons">
                                <form action="{{ route('book.delete', $book->id) }}" method="post"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    <button class="delete-btn">Delete</button>
                                </form>


                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="update-btn">
                                    <a href="{{ route('book.update', $book->id) }}">Edit</a>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
