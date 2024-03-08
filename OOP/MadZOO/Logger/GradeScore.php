<?php

namespace Zoo\Logger {
    class GradeScore
    {
        public int $badScore = 0;
        public int $goodScore = 0;
    }
    enum Grade
    {
        case Good;
        case Bad;
    }
    enum TypeLog
    {
        case Zoo;
        case Client;
    }

}
