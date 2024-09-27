<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<script src="{{asset('')}}vendors/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
  $('#myTable').DataTable();

  // Ticket
  function closeTicket(id) {
  $.ajax({
      url: "{{ route('closeTicket') }}",
      method: 'GET',
      data: {
          id: id
      },
      dataType: 'json',
      success: function (data) {
        console.log(data);
          $('#myTable').load(location.href +' #myTable');
      }
  })
}

</script>