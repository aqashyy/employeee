<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">

        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="form">
                    <label for="key">Search</label>
                    <input type="text" id="searchBox" class="form-control form-input" name="key"
                        placeholder="Search name/designation/department">
                </div>
                <div id="result" class="row mt-4">
                    @if ($users)
                        @foreach ($users as $user)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $user->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $user->department->name }}</h6>
                                        <p class="card-text">{{ $user->designation->name }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Department</p>

                          </div>
                    </div>
                </div> --}}
                </div>
            </div>

        </div>

    </div>

    <script>
        $(document).ready(function() {
            // console.log('test');
            $('#searchBox').on('keyup', function() {
                // console.log($(this).val());
                let searchInput = $(this).val();
                $.ajax({
                    url: "{{ url('/search') }}",
                    data: {
                        key: searchInput
                    },
                    success: function(response) {
                        console.log('succeess');
                        // console.log(response);
                        let html = '';
                        if (response.length > 0) {
                            response.forEach(user => {

                                html += `<div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">${ user.name }</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">${ user.department.name }</h6>
                                                    <p class="card-text">${ user.designation.name }</p>
                                                </div>
                                            </div>
                                        </div>`;
                            });
                            $('#result').html(html);
                        }else{
                            $('#result').html('<p>No Result Found</p>');
                        }
                        // $('#result').html($(response).find('#result').html());
                    },
                    error: function(){
                        $('#result').html('<p>Something went wrong...</p>');
                    }

                })
            });
        });
    </script>
</body>

</html>
