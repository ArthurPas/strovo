function creerBarGraph(id, obj) {
    let donnees = [];
    let lab = [];
    for (let i = 0; i < obj.length; i++) {
        donnees[i] = obj[i].km;
        lab[i] = obj[i].periode;
    }
    const ctx = document.getElementById(id).getContext('2d');
    const kmMois = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: lab,
            datasets: [{
                label: '',
                data: donnees,
                backgroundColor: "#52CDFF",
                borderColor: [
                    '#52CDFF',
                ],
                borderWidth: 0,
                fill: true, // 3: no fill
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function () {
    const obj = JSON.parse(this.responseText);
    creerBarGraph("kmMois", obj);
}
xmlhttp.open("GET", "models/graph_kmMois_data.php");
xmlhttp.send();