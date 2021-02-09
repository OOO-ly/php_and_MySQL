let issubmit = true;
doublecheck = () =>{
if(issubmit)
{
    issubmit = false;
    return true;
}else{
    e.preventDefault();
    document.write("asd");
    }
}