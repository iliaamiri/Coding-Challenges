using System.Collections.Generic;
using System.Linq;

namespace Skyit_Coding_Challenge.Functions
{
    class Functions
    {
        public string FormatDeterminer(string inputString)
        {
            var netInputString = inputString.Trim();
            var firstCharacter = netInputString.Substring(0, 1);

            string outputString = "Unable to mask";

            switch (firstCharacter)
            {
                //SAMPLE INPUT STRING #1
                case "[":
                    outputString = InputType1(netInputString);
                    break;
                //SAMPLE INPUT STRING #2
                case "R":
                    outputString = InputType2(netInputString);
                    break;
                //SAMPLE INPUT STRING #3
                case "{":
                    outputString = InputType3(netInputString);
                    break;

                //SAMPLE INPUT STRING #4
                case "<":
                    outputString = InputType4(netInputString);
                    break;

                //UNKNOWN
                default:
                    outputString = "Unable to mask";
                    break;
            }

            return outputString;
        }


        private string InputType1(string netInputString)
        {
            char[] delimiterChars = { '\r', '\n' };
            var rowSplits = netInputString.Split(delimiterChars);
            var rowDic = new Dictionary<string, string>();
            foreach (var rowSplit in rowSplits)
            {
                if (rowSplit.Trim() != string.Empty)
                {
                    rowDic.Add(rowSplit.Trim().Replace("[", "").Split(']').First(),
                        rowSplit.Trim().Split('>').Last().Trim());
                    //rowDic.Add(rowSplit.Trim().Split('>').First().Trim(), rowSplit.Trim().Split('>').Last().Trim());
                }
            }

            string outputString = string.Empty;
            foreach (var a in rowDic)
            {
                // Sensitive data should be masked (replaced) with an Asterix (*) character.
                // Sensitive data includes the fields below, but new sensitive fields should be easily added to the function as needed:
                // The credit card number
                // The credit card expiry date
                // The credit card CVV value

                var valueString = a.Value;
                switch (a.Key)
                {
                    case "cardNumber":
                        valueString = MaskString(a.Value);
                        break;
                    case "cardExpiry":
                        valueString = MaskString(a.Value);
                        break;
                    case "cardCVV":
                        valueString = MaskString(a.Value);
                        break;
                        // can add any data 
                }

                outputString += "[" + a.Key + "] => " + valueString + "\r\n";
            }

            // remove "\\r\\n" from last 
            outputString = outputString.Substring(0, outputString.Length - 2);

            return outputString;
        }

        private string InputType2(string netInputString)
        {
            var rowSplits = netInputString.Split('.');
            var rowDic = new Dictionary<string, string>();
            foreach (var rowSplit in rowSplits)
            {
                if (rowSplit.Trim() != string.Empty)
                    rowDic.Add(rowSplit.Split('=').First().Trim(), rowSplit.Split('=').Last().Trim());
            }

            string outputString = string.Empty;
            foreach (var a in rowDic)
            {
                // Sensitive data should be masked (replaced) with an Asterix (*) character.
                // Sensitive data includes the fields below, but new sensitive fields should be easily added to the function as needed:
                // The credit card number
                // The credit card expiry date
                // The credit card CVV value

                var valueString = a.Value;
                switch (a.Key)
                {
                    case "Account_Card_Number":
                        valueString = MaskString(a.Value);
                        break;
                    case "Account_Expiry":
                        valueString = MaskString(a.Value);
                        break;
                    case "CVV":
                        valueString = MaskString(a.Value);
                        break;
                        // can add any data 
                }

                outputString += a.Key + "=" + valueString + ".";

            }

            // remove "." from last 
            outputString = outputString.Substring(0, outputString.Length - 1);

            return outputString;
        }


        private string InputType3(string netInputString)
        {
            var rowSplits = netInputString.Replace("{", "").Replace("}", "").Trim().Split(',');
            var rowDic = new Dictionary<string, string>();
            foreach (var rowSplit in rowSplits)
            {
                if (rowSplit.Trim() != string.Empty)
                {
                    rowDic.Add(rowSplit.Replace("\"", "").Split(':').First().Trim(),
                        rowSplit.Split(':').Last().Trim());
                }
            }

            string outputString = string.Empty;
            foreach (var a in rowDic)
            {
                // Sensitive data should be masked (replaced) with an Asterix (*) character.
                // Sensitive data includes the fields below, but new sensitive fields should be easily added to the function as needed:
                // The credit card number
                // The credit card expiry date
                // The credit card CVV value

                var valueString = a.Value;
                switch (a.Key)
                {
                    case "CardNumber":
                        valueString = MaskString(a.Value);
                        break;
                    case "CardExp":
                        valueString = MaskString(a.Value);
                        break;
                    case "CardCVV":
                        valueString = MaskString(a.Value);
                        break;
                        // can add any data 
                }

                outputString += $"    \"{a.Key}\": {valueString},\r\n";
            }

            // add first & Last Line
            outputString = "{\r\n" + outputString + "}";

            return outputString;
        }

        private string InputType4(string netInputString)
        {
            var netInputStringSplit = netInputString.Replace("<NewOrder>", "╟").Replace("</NewOrder>", "╟").Split('╟');

            var rowSplits = netInputStringSplit[1].Replace("</", "╟").Replace(">\r", "╝").Replace(">\n", "╝").Trim().Split('╝');

            var rowDic = new Dictionary<string, string>();
            foreach (var rowSplit in rowSplits)
            {
                if (rowSplit.Trim() != string.Empty)
                {
                    rowDic.Add(rowSplit.Replace("\n", "").Replace("\r", "").Replace("\t", "").Replace("<", "").Split('>').First().Trim(),
                        rowSplit.Split('>').Last().Trim());
                }
            }

            string outputString = string.Empty;
            foreach (var a in rowDic)
            {
                // Sensitive data should be masked (replaced) with an Asterix (*) character.
                // Sensitive data includes the fields below, but new sensitive fields should be easily added to the function as needed:
                // The credit card number
                // The credit card expiry date
                // The credit card CVV value

                var valueString = a.Value;
                switch (a.Key)
                {
                    case "CardDataNumber":
                        valueString = MaskString(a.Value.Split('╟').First()) + "</" + valueString.Split('╟').Last();
                        break;
                    case "Exp":
                        valueString = MaskString(a.Value.Split('╟').First()) + "</" + valueString.Split('╟').Last();
                        break;
                    case "CVVCVCSecurity":
                        valueString = MaskString(a.Value.Split('╟').First()) + "</" + valueString.Split('╟').Last();
                        break;
                        // can add any data 
                }

                outputString += $"\t\t<{a.Key}>{valueString.Replace("╟", "</")}>,\r\n";
            }

            // add first & Last Line
            outputString = netInputStringSplit.First().Trim() + "\r\n\t<NewOrder>\r\n" + outputString + "\t</NewOrder>" + netInputStringSplit.Last();

            return outputString;
        }

        private string MaskString(string mas)
        {
            string maskString = string.Empty;
            for (int i = 0; i < mas.Length; i++)
            {
                maskString += "*";
            }

            return maskString;
        }
    }
}
