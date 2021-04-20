const table = document.getElementsByTagName("TABLE")[0];
const email = document.getElementById("email");
const date = document.getElementById("date");
const domains = document.getElementsByName("domain");
const search = document.getElementsByName('search')[0];
const select = document.getElementsByName('select')[0];
const csv = document.getElementsByName('csv')[0];

var order = 'DESC';
var temp = subs;

window.addEventListener('load', () => {
  sortByDate(subs);
  displayRows(table, subs);
});

email.addEventListener('click', () => {
  removeTableRows();
  sortByEmail(temp);
  displayRows(table, temp);
});

date.addEventListener('click', () => {
  removeTableRows();
  sortByDate(temp);
  displayRows(table, temp);
});

domains.forEach(domain => 
  domain.addEventListener('click', () => {
    removeTableRows();
    if(domain.value === 'all') temp = subs;
    else temp = subs.filter((obj) => obj.domain === domain.value);
    displayRows(table, temp);
  })
);

search.addEventListener('keyup', () => {
  removeTableRows();
  if(search.value === '') temp = subs;
  else temp = subs.filter(obj => obj.email.includes(search.value));
  displayRows(table, temp);
});

select.addEventListener('change', () => {
  let cbs = document.querySelectorAll('td input')
  if(select.checked) cbs.forEach(cb => cb.checked = true);
  else cbs.forEach(cb => cb.checked = false);
});

function removeTableRows() {
  let trs = document.querySelectorAll('tr:not(:first-child)');
  trs.forEach(tr => tr.remove());
}

function sortByEmail(arr) { 
  if(order === 'DESC') {
    arr.sort(
      (x, y) => (x.email < y.email) ? 1 : -1
    );
    order = 'ASC';
  } else {
    arr.sort(
      (x, y) => (x.email > y.email) ? 1 : -1
    );
    order = 'DESC';
  }
}

function sortByDate(arr) {
  if(order === 'DESC') {
    arr.sort(
      (x, y) => (x.created_at < y.created_at) ? 1 : -1
    );
    order = 'ASC';
  } else {
    arr.sort(
      (x, y) => (x.created_at > y.created_at) ? 1 : -1
    );
    order = 'DESC';
  }
}

function displayRows(table, data) {
  for(let i=0; i<data.length; i++) {
    let tr = document.createElement('TR');
    let td1 = document.createElement('TD');
    let td2 = document.createElement('TD');
    let td3 = document.createElement('TD');
    let input = document.createElement('INPUT');

    input.type = 'checkbox';
    input.name = "e-"+data[i].id;
    input.value = data[i].id;

    td1.innerText = data[i].email;
    td2.innerText = data[i].created_at;
    td3.appendChild(input);

    tr.className = data[i].domain;
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    table.appendChild(tr);
  }
}