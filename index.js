const express = require("express");
const app = express();
const data = require("./data.json");

app.get("/data", (req, res) => {
    res.json(data);
});

app.listen(3000, () => {
    console.log("API listening on port 3000");
});

