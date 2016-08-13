#!/usr/bin/env python
# encoding: utf-8

import json
import urllib
import re

regex = '<a href="/video/(av\d+)/" target="_blank" class="title" title="(.*?)">[\s|\S]+?desc">([\s|\S]+?)</div>[\s|\S]+?title="观看"></i><span number="\d+">(\d+)</span>[\s|\S]+?title="弹幕"></i><span number="\d+">(\d+)[\s|\S]+?title="收藏"></i><span number="\d+">(\d+)</span>';

if __name__ == '__main__':
    pageContent = urllib.urlopen('http://www.bilibili.com/list/damku-32-1-2016-08-06~2016-08-12.html').read();
    pattern = re.compile(regex)
    for item in pattern.finditer(pageContent):
        print item.group(2)
