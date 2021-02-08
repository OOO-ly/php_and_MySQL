var acceessableCount = 1; //동시접근제한수

$('#submit').onclick(function () {
    
    acceessableCount  = acceessableCount -1; //count부터 뺀다

    if (acceessableCount <= 0 ) {
      alert("이미 작업이 수행중입니다.");
    } else {
      return true;
    }

    acceessableCount = acceessableCount +1;     //작업이 끝난 후 다시 작업할수 있게하려면 +1을 한다. 회복시키지 않으면 코드제거.

});

