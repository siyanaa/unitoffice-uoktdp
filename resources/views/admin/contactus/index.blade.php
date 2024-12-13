@extends('admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Contact Messages Table -->
    <table class="table table-bordered table-hover mt-4">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $contact->name ?? '' }}</td>
                    <td>{{ $contact->email ?? '' }}</td>
                    <td>{{ $contact->phone ?? '' }}</td>
                    <td>{{ $contact->message ?? '' }}</td>
                    <td>
                        <a href="{{ url('Admin/Contactus/Destroy/'.$contact->id) }}">
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        </a>
                        <a href="{{ url('Admin/Contactus/Show/'.$contact->id) }}">
                            <button type="button" class="btn btn-success btn-sm">Show</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- reCAPTCHA initialization -->
<script type="text/javascript">
    // Form submission with reCAPTCHA validation
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        var response = grecaptcha.getResponse();
        if (response.length === 0) { // reCAPTCHA not verified
            event.preventDefault(); // Prevent form submission
            alert("Please tick the reCAPTCHA box before submitting.");
        }
    });
</script>