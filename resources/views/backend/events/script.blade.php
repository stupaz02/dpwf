
@section('script')
<script type="text/javascript">
     
      $('#start_date').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss',
          showClear: true
      });

      $('#end_date').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss',
          showClear: true
      });

   
</script>
@endsection
