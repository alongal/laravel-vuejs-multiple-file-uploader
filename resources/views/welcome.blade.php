<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style media="screen">
            nav.navbar {
                margin-bottom: 0;
            }

            #image-form-wrapper {
                padding-top: 20px;
                background: #f7f7f7;
            }

            #images {
                background: #eee;
                padding: 20px 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        My Images
                    </a>
                </div>
            </div>
        </nav>

        <section id="image-form-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Upload Your Receipts</div>
                            <div class="panel-body">
                                <form action="/" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="filename">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="images">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="https://via.placeholder.com/450x300" alt="">
                            <div class="caption">
                                <h3>Image Title</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    </body>
</html>
