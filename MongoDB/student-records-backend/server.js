const express = require('express');
const dotenv = require('dotenv');
const connectDB = require('./dbconfig');
const studentRoutes = require('./routes/studentroutes');
const cors = require('cors'); // Move this up

dotenv.config();
connectDB();

const app = express();

app.use(cors());
app.use(express.json());

app.use('/students', studentRoutes);

const PORT = process.env.PORT || 5000;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));
