#!/usr/bin/env python3

import yaml
import json
import sys
import io
ymlf, jsonf = sys.argv[1:3]

print(ymlf, jsonf)

with open(ymlf, 'r') as fh:
    data = yaml.load(fh, Loader=yaml.SafeLoader)

with open(jsonf, 'w') as fh:
    j = json.dumps(data, indent=4, ensure_ascii=False)
    fh.write(j)
