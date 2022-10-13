<script>
function test(){
  {
        
        const data = { 
            "_token": "{{ csrf_token() }}",
            "id": id };
            
        fetch('/tables/select', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log('Success:', data)
            if(data.status == 201){
              // implements
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });

}
</script>