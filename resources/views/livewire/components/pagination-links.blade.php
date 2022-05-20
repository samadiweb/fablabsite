@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
    <!-- prev -->
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>    
    @else
    <li class="page-item ">
      <a class="page-link" wire:click="previousPage" tabindex="-1">Previous</a>
    </li>
    @endif
    <!-- prev end -->

    <!-- numbers -->
    @foreach ($elements as $element)
    <div class="flex">
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item"><a class="page-link active"  wire:click="gotoPage({{$page}})">{{$page}}</a></li>

        @else
        <li class="page-item"><a class="page-link "  wire:click="gotoPage({{$page}})">{{$page}}</a></li>
        @endif
        @endforeach
        @endif
    </div>
    @endforeach
    <!-- end numbers -->


    <!-- next  -->
    @if ($paginator->hasMorePages())
    <li class="page-item active">
      <a class="page-link "  wire:click="nextPage">Next</a>
    </li>
    @else
    <li class="page-item disabled">
      <a class="page-link" href="#">Next</a>
    </li>
    @endif
    <!-- next end -->
</ul>
</nav>
@endif

