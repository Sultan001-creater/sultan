const express = require("express")

const app = express()

app.use(express.json())
app.use(express.urlencoded({ extended: true }))
const port = process.env.PORT || "8080"


app.get("/", (reg, res) => {
    res.send(`<h1> app is running on port: ${port}</h1>`)
})
app.listen(port, () => `Server is running on port: ${port} `)