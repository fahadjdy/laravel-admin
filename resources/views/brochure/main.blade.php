<div class="print-content">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sr.</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Product Image</th>
            </tr>
        </thead>

        @foreach ($category as $key => $val)
        <tr >
            <td> {{ $key + 1 }} </td>
            <td>{{ $val['name'] }}</td>
            <td>{{   $val['parent']['name'] ?? '-' }}</td>
            <td> <img height="100px" src="{{ asset($val['thumbnail']) }}" alt="{{ $val['name'] }}">  </td>
        </tr>
        
        @endforeach
    </table>
</div>