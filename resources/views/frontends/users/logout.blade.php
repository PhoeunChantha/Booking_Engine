<form method="POST" action="{{ route('customer.logout') }}"  class="modal chaufea-modal py-4" enctype="multipart/form-data">
    @csrf
    <p class="d-flex justify-content-center"><i class="fas fa-exclamation logout-icon"></i></p>
    <h2 class="chaufea-heading-2 text-center mb-4">Are you leaving?</h2>
    <p class="text-center">Are you sure you want to logout? All your unsaved data will be lost.</p>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="form-group d-flex w-100 justify-content-end" style="gap:10px;">
                <a href="#" class="chaufea-btn-1 px-5 bg-danger" rel="modal:close">Cancel</a>
                <button  class="chaufea-btn-1" type="submit" px-5 >Logout</button>
            </div>
        </div>
    </div>
</form>


