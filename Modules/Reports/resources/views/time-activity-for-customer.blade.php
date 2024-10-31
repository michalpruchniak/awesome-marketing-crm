<div class="table-responsive">
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th scope="col">Month</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $element)
                <tr>
                    <td>{{ $element->month }}</td>
                    <td>{{ $element->total_duration }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
