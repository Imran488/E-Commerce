@extends('admin.master')
@section('contents')
<!-- Message -->
@if(session()->has('error'))
<p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<!-- end -->


<div class="table_button">
    <a href="{{route('add.partner')}}" class="btn btn-primary">Add Partner</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover" id="partnerTable">
        <thead class="table-primary">
            <tr class="text-center">
                <th>ID</th>
                <th>Company Name</th>
                <th>Company Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $key=> $partner)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $partner->name }}</td>
                <td><img src="{{ asset('/uploads/partner/'.$partner->image ) }}" style="width:80px;height:80px;" alt=""></td>
                <td>
                    <a href="{{ route('view.partner',$partner->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('edit.partner',$partner->id) }}" class="btn btn-primary"><i class="fa fa-th-list"></i></a>
                    <a href="{{ route('delete.partner',$partner->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#partnerTable').DataTable();
    });
</script>
