FROM python:3

RUN apt-get update && apt-get install -y python3-pip python-pytest #You don't need to install pip, because it is already there in python's image

RUN pip install -U selenium
RUN pip install xmlrunner

CMD tail -f /dev/null

