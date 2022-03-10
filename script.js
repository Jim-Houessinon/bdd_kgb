var w = 0;
var x = 0;
var y = 0;
var tr = document.createElement('tr');
var tr1 = document.createElement('tr');
var tr2 = document.createElement('tr');

function rajoutEntete(entete)
{
    x = 0;
    
    if(w == 0)
    {   
        let thead = document.getElementById('thead');
        thead.append(tr);
    }

    let th = document.createElement('th');
    th.innerText = entete;
    tr.append(th);
    w++;

}

function rajoutValeurs(val)
{ 
    w = 0;

    if(x == 14)
    {
        rajoutTr(val);
    }

    if(x == 0)
    {
        let tbody = document.getElementById('tbody');
        tbody.append(tr1);
    }

    let td = document.createElement('td');
    td.innerText = val;
    tr1.append(td);
    x++;
}

function rajoutTr(val)
{
    let td = document.createElement('td');
    
    if(y == 0)
    {
        let tbody = document.getElementById('tbody');
        tbody.append(tr2);
    }

    td.innerText = val;
    tr2.append(td);
    y++;

    if(y == 1)
    {
        x = 0;
        y = 0;
    }

    return;
}
