<script>
	$(function() {
function load_proposals(){
  $("#proposals").DataTable({
  'processing': true,
  'serverSide': true,
  'serverMethod': 'post',
  'sDom': 'lBfrtip',
  'ajax': {
    'url': '../include/displayproposal.php'
  },
  'columns': [
    {data: 'title'},
    {data: 'funding'},
    {data: 'status'},
    {data: 'button'}
  ]
})
  }
</script>