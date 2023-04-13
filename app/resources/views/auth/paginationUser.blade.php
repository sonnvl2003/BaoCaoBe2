<div class="container">
    <div class="pagination-wrapper d-flex justify-content-center">
        @if (isset($panigation))
            {{ $panigation->links() }}
        @endIf
    </div>
</div>
