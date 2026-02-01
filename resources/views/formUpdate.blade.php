<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .form-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 500px;
        }

        .form-header {
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 3px solid #667eea;
            padding-bottom: 20px;
        }

        .form-header h1 {
            color: #333;
            font-weight: 700;
            font-size: 28px;
            margin: 0;
        }

        .form-header p {
            color: #666;
            margin-top: 5px;
        }

        .book-id-badge {
            display: inline-block;
            background-color: #e9ecef;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: #666;
            margin-top: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #adb5bd;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-submit {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-cancel {
            flex: 1;
            background-color: #e9ecef;
            border: none;
            color: #333;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-cancel:hover {
            background-color: #dee2e6;
            transform: translateY(-2px);
            color: #333;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <h1><i class="bi bi-pencil-square"></i> Edit Book</h1>
            <p>Update book information</p>
            <div class="book-id-badge">Book ID: #{{ $book->id }}</div>
        </div>

        <form action="{{ route('edit.book') }}" method="post" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{ $book->id }}">

            <div class="form-group">
                <label for="name" class="form-label">Book Name *</label>
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror" placeholder="Enter book name"
                    value="{{ old('name', $book->name) }}" required>
                @error('name')
                    <div class="invalid-feedback" style="display: block; color: #dc3545; font-size: 13px; margin-top: 5px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description *</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    placeholder="Enter book description" required>{{ old('description', $book->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback" style="display: block; color: #dc3545; font-size: 13px; margin-top: 5px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn-submit">
                    <i class="bi bi-check-circle"></i> Update Book
                </button>
                <a href="{{ route('index') }}" class="btn-cancel">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
