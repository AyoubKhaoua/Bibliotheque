<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Library</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .page-title {
            text-align: center;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .book-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .book-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .book-name {
            font-size: 1.5rem;
            color: #2d3748;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .book-description {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .apply-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .apply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .apply-btn:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .books-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
</head>

<body>

    <h1 class="page-title">Our Book Library</h1>

    <div class="books-grid">
        @foreach ($books as $book)
            <div class="book-card">
                <div>
                    <h2 class="book-name">{{ $book->name }}</h2>
                    <p class="book-description">{{ $book->description }}</p>
                </div>
                <form action="{{ route('books.apply', $book->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="apply-btn">Apply</button>
                </form>
            </div>
        @endforeach
    </div>

</body>

</html>
