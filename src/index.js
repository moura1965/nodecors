const express = require("express");
const app = express();
const data = require("../data.json");
const path = require('path')
const cors = require('cors')

app.use(cors())

app.use('/public', express.static(path.join(__dirname, 'public')))

app.get("/data", (req, res) => {
      res.json(data);
});

app.get('/app', (_, res) => {
    res.sendFile(path.join(__dirname, 'view/index.html'))
})

app.listen(3000, () => {
    console.log("API listening on port 3000");
});

