function colorChange(currElem){
    document.getElementById(currElem).style.color="#000"
  
  }
  function copy(currElem){
    let copyText = document.getElementById(currElem).textContent;
    console.log(copyText)
    navigator.clipboard.writeText(copyText)
    .then(() => {
    document.getElementById(currElem).style.color="red"
  
      setTimeout(colorChange, 1000,currElem);
    })
  }
  
  
    
    function exportReportToExcel() {
      let table = document.getElementsByTagName("table"); 
      TableToExcel.convert(table[0], { 
        name: `export.xlsx`, 
        sheet: {
          name: 'Sheet 1' 
        }
      });
    }
  
  
  function DownloadAll(){
  let href = document.querySelectorAll('.downloadLink')
  let i = 0;
  let timer = setInterval(function() {
    if (i >= href.length) {
      clearInterval(timer)
      alert("Готово!")
    } else {
      href[i++].click()
    }
  }, 1500)
  
  }
  

  $(function() {
    $(document).ready(function()
    {
        var bar = $('.bar');
        var percent = $('.percent');
          $('.loadForm').ajaxForm({
            beforeSend: function() {
                var percentVal = '0%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            complete: function(xhr) {
                alert('File Has Been Uploaded Successfully');
            }
          });
    }); 
 });
  
   $(function() {  
    $('.btn-6')
      .on('mouseenter', function(e) {
        var parentOffset = $(this).offset(),
            relX = e.pageX - parentOffset.left,
            relY = e.pageY - parentOffset.top
        $(this).find('span').css({top:relY, left:relX})
      })
      .on('mouseout', function(e) {
        var parentOffset = $(this).offset(),
            relX = e.pageX - parentOffset.left,
            relY = e.pageY - parentOffset.top
        $(this).find('span').css({top:relY, left:relX})
      });
  });


  
  const theme ={
    name:'',
    el:document.body,
    allow:['light','dark'],
    init(){
      this.name = localStorage.getItem('schemeName') || this.allow[0]
      this.el.setAttribute('scheme',this.name)
  
    },
    toggle(){
      if (this.name==''){
        return this.save(this.allow[0])
      }
      if(this.name==this.allow[0]){
        return this.save(this.allow[1])
      }
      if(this.name==this.allow[1]){
        return this.save(this.allow[0])
      }
    },
    save(name){
      this.name = name
      localStorage.setItem('schemeName', name)
      this.el.setAttribute('scheme', name)
    }
  
  }
  theme.init()