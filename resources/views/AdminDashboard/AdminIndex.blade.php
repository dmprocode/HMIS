@include('templeteController.Header');
@include('templeteController.SideNave');
@include('templeteController.TopNave')
<div class="row">

    <div class="col-12">
        <div class="card update-user-card">
            <div class="card-body">
                @if(session()->has('success'))
                <h2>{{session()->get('success')}}</h2>
                @endif

               
        
        </div>
    </div> <!-- end card-->
</div> <!-- end col -->


</div>

@include('templeteController.Footer');