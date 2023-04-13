<div class="container">
    <div class="pagination-wrapper">
        @if (isset($panigation))
            {{ $panigation->links() }}
        @endIf
    </div>
</div>
