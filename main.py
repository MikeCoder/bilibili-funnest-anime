#!/usr/bin/env python
# encoding: utf-8

import json
import urllib
import re
import datetime

csv_file = '完结动漫数量数据.csv'

regex = '<a href="/video/av(\d+)/" target="_blank" class="title" title="(.*?)">[\s|\S]+?desc">([\s|\S]+?)</div>[\s|\S]+?title="观看"></i><span number="\d+">(\d+)</span>[\s|\S]+?title="弹幕"></i><span number="\d+">(\d+)[\s|\S]+?title="收藏"></i><span number="\d+">(\d+)</span>';
base_url = 'http://www.bilibili.com/list/damku-32-'
video_base_url = 'http://www.bilibili.com/video/av'

animes = {}

def writeCSVFile(file, date, num):
    file = open(file, 'a')
    file.write(str(date) + ', ' + str(num) + "\n")

if __name__ == '__main__':
    start_date = datetime.date(2008, 8, 1)
    end_date = datetime.date.today()

    current_date = start_date

    while current_date != end_date:
        writeCSVFile(csv_file, current_date, len(animes))
        for page in range(1, 30):
            url = base_url+str(page)+'-'+str(current_date)+'~'+str(current_date)+'.html'
            pageContent = urllib.urlopen(url).read()
            if pageContent == '':
                break;

            pattern = re.compile(regex)
            for item in pattern.finditer(pageContent):
                if item.group(1) in animes:
                    animes[item.group(1)]['endDate'] = current_date
                else:
                    animes[item.group(1)] = {'aid': item.group(1), 'title': item.group(2), 'desc': item.group(3), 'playNum': item.group(4), 'comNum': item.group(5), 'collNum': item.group(6), 'startDate': str(current_date), 'endDate': str(current_date)}

            open('anime.data', 'w').write(json.dumps(animes, ensure_ascii=False))

        current_date = current_date + datetime.timedelta(1)
