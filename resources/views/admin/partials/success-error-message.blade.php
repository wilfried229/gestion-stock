<div class="row">
    <div class="container">
        @if(session('error'))
            <div class="row mb-1">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="alert alert-dismissible alert-danger">
                        <strong>{{session('error')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @if(session('success'))
            <div class="row mb-1">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="alert alert-dismissible alert-success">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
